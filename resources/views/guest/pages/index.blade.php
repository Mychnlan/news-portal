@extends('guest.main')
@section('content')
<div class="tw-overflow-x-auto tw-whitespace-nowrap tw-bg-white tw-shadow-md tw-py-2 tw-px-4 custom-scrollbar ">
    <button data-category="All" class="tw-m-2 tw-px-4 tw-py-2 tw-bg-blue-500 tw-text-white tw-rounded-lg tw-shadow-md tw-transition tw-duration-300 hover:tw-bg-blue-600 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-blue-400 active:tw-bg-blue-500" onclick="filterCategory(this)">All</button>
    @foreach ($categories as $item)
    <button data-category="{{$item->name}}" class="tw-m-2 tw-px-4 tw-py-2 tw-bg-gray-200 tw-text-gray-800 tw-rounded-lg tw-shadow-md tw-transition tw-duration-300 hover:tw-bg-gray-300 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-gray-400 active:tw-bg-gray-400" onclick="filterCategory(this)">{{$item->name}}</button>  
    @endforeach
</div> 
<section id="#" class="tw-mt-2 tw-mx-4">
<div id="content" class="tw-flex tw-flex-wrap tw-justify-left tw-gap-4">

</div>
</section>
<script>
    function filterCategory(button, category) {
      // Remove active styles from all buttons
      // Simpan tombol-tombol dalam sebuah variabel
  const buttons = document.querySelectorAll('button');
  
  // Tentukan tombol default yang akan diberi kelas aktif
  const defaultButton = buttons[0]; // Misalnya, gunakan tombol pertama sebagai default
  
  // Tambahkan kelas aktif secara default ke tombol default
  defaultButton.classList.add('tw-bg-blue-500', 'tw-text-white');
  
  // Iterasi melalui setiap tombol
  buttons.forEach(button => {
      // Tambahkan event listener untuk setiap tombol
      button.addEventListener('click', () => {
          // Hapus kelas aktif dari semua tombol
          buttons.forEach(btn => {
              btn.classList.remove('tw-bg-blue-500', 'tw-text-white');
              btn.classList.add('tw-bg-gray-200', 'tw-text-gray-800');
          });
  
          // Tambahkan kelas aktif ke tombol yang diklik
          button.classList.remove('tw-bg-gray-200', 'tw-text-gray-800');
          button.classList.add('tw-bg-blue-500', 'tw-text-white');
      });
  });
  
      // Get category from data attribute
      const selectedCategory = button.getAttribute('data-category');
      console.log(`Category selected: ${selectedCategory}`);
    
      // Make AJAX request to fetch category data
      $.ajax({
        url: `/categories/${selectedCategory}`,
        type: 'GET',
        success: function(data) {
          console.log(`Data retrieved:`, data);
          // Update content section with received data
          $('#content').html('');  // Clear previous content
                  if (data.length > 0) {
                      data.forEach(item => {
                        const tagsHtml = Array.isArray(item.tags) ? item.tags.map(tag => `
                            <span class="m-1 bg-gray-200 hover:bg-gray-300 rounded-full px-2 font-bold text-sm leading-loose cursor-pointer">#${tag.name}</span>
                        `).join('') : '';
                          $('#content').append(`                     
                           <div class="tw-max-w-52 tw-bg-white tw-border tw-border-gray-200 tw-rounded-lg tw-shadow tw-dark:bg-gray-800 tw-dark:border-gray-700">
                       
                              <a href="/news/${item.slug}">
                                  <img class="tw-rounded-t-lg tw-w-full" src="/${item.media.file_path}" alt="${item.media.file_name}" style="height:100px; width: 100%;"/>
                              </a>
                        
                          <div class="tw-p-5">
                              <a href="/news/${item.slug}">
                                  <h5 class="tw-mb-2 tw-text-lg tw-font-bold tw-tracking-tight tw-text-gray-900 tw-dark:text-white tw-max-h-20 tw-overflow-hidden tw-line-clamp-3">
                                      ${item.title} 
                                  </h5>
                              </a>
                              <div class="my-3 flex flex-wrap -m-1 h-5">
                                        ${tagsHtml}
                              </div>
                            
                          </div>
                      </div>
  
                          `);
                      });
          } else {
            $('#content').append('<p>No data available</p>');
          }
        },
      });
    }
  
    // Load all categories by default on page load
    $(document).ready(function() {
      filterCategory(document.querySelector('button'), 'all');
  
      $.ajax({
          url: '/categories',
          type: 'GET',
          success: function(data) {
              console.log(`Data retrieved:`, data);
              // Update content section with received data
              $('#content').html('');  // Clear previous content
              if (data.length > 0) {
                  data.forEach(item => {
                    const tagsHtml = item.tags.map(tag => `
                            <span class="m-1 bg-gray-200 hover:bg-gray-300 rounded-full px-2 font-bold text-sm leading-loose cursor-pointer">#${tag.name}</span>
                        `).join('');
                      $('#content').append(`
                      <div class="tw-max-w-52 tw-bg-white tw-border tw-border-gray-200 tw-rounded-lg tw-shadow tw-dark:bg-gray-800 tw-dark:border-gray-700">                     
                              <a href="/news/${item.slug}">
                                  <img class="tw-rounded-t-lg" src="/${item.media.file_path}"  alt="${item.media.file_name}" style="height:100px; width: 100%;"/>
                              </a>
                        
                          <div class="tw-p-5">
                              <a href="/news/${item.slug}">
                                  <h5 class="tw-mb-2 tw-text-lg tw-font-bold tw-tracking-tight tw-text-gray-900 tw-dark:text-white tw-max-h-20 tw-overflow-hidden tw-line-clamp-3">
                                      ${item.title} 
                                  </h5>
                              </a>
                              <div class="flex tw-w-full tw-overflow-x-scroll tw-whitespace-nowrap custom-scrollbar">
                                <div class="tw-flex tw-space-x-2 tw-p-2 tw-mb-2">
                                            ${tagsHtml}
                                </div>
                              </div>
                              
                          </div>
                      </div>
  
                      `);
                  });
              } else {
                  $('#content').append('<p>No data available</p>');
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(`Error: ${textStatus}, ${errorThrown}`);
              $('#content').html('<p>Error retrieving data</p>');
          }
      });
    });
  </script>
@endsection
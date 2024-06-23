@extends('guest.main')
@section('content')
<div id="content" class="container">
    <div class="row tw-my-20">
        <div id="article-section" class="col-sm-9 tw-bg-slate-200 tw-overflow-y-scroll tw-h-screen custom-scrollbar tw-pb-10 tw-pt-4 ck-content"></div>
        <div id="other-articles-section" class="col-sm-3 tw-bg-slate-500"></div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Extract slug from URL
        var pathArray = window.location.pathname.split('/');
        var slug = pathArray[pathArray.length - 1];

        // AJAX request to fetch main article data
        $.ajax({
            url: '/data-article/' + slug,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var articleContent = `
                <p class="tw-mb-4 tw-font-light">Updated: ${data.time_since_published}, By ${data.author.full_name}</p>
                <section class="tw-bg-white tw-dark:bg-gray-900 tw-flex">
                    <div class="tw-py-8 tw-px-4 tw-mx-auto tw-max-w-screen-xl tw-lg:py-16 tw-lg:px-6">
                        <div class="tw-max-w-screen-lg tw-text-gray-500 tw-sm:text-lg tw-dark:text-gray-400">
                            <h2 class="tw-mb-4 tw-text-4xl tw-tracking-tight tw-font-bold tw-text-gray-900 tw-dark:text-white">${data.title}</h2>
                            <p class="tw-mb-10 tw-font-light">${data.content}</p>            
                        </div>
                    </div>
                </section>`;
                $('#article-section').append(articleContent);

                // Fetch other articles
                $.ajax({
                    url: '/data-article/others/' + slug,
                    type: 'GET',
                    dataType: 'json',
                    success: function(articles) {
                        var otherArticlesContent = '<div class="tw-pt-10"><h3 class="tw-mb-4 tw-text-2xl tw-font-bold tw-text-gray-900 tw-dark:text-white">Related Articles</h3>';
                        articles.forEach(article => {
                            otherArticlesContent += `
                                <div class="tw-mb-4">
                                    <h4 class="tw-text-xl tw-font-medium tw-text-gray-800 tw-dark:text-gray-200"><a href="/news/${article.slug}">${article.title}</a></h4>
                                    
                                </div>
                            `;
                        });
                        otherArticlesContent += '</div>';
                        $('#other-articles-section').append(otherArticlesContent);
                    },
                    error: function(xhr, status, error) {
                        $('#other-articles-section').html('<h1>Failed to load other articles</h1>');
                    }
                });
            },
            error: function(xhr, status, error) {
                if (xhr.status === 404) {
                    window.location.href = '/404';
                } else {
                    $('#content').html('<h1>Something went wrong</h1>');
                }
            }
        });
    });
</script>
@endsection
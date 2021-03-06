@extends('Templates.Outside')

@section('head')
@include('Topbar.Topbar')
@endsection


@section('body')

<!-- SIDEBAR START -->
@include('Sidebars.Sidebar-Mainpage.Sidebar')
<!-- SIDEBAR END -->

<!-- CONTAINER MAINPAGE START -->
@include('Container.Container-Mainpage.MainPage')
<!-- CONTAINER MAINPAGE END -->

@endsection

@section('scripts')
<script>

	 $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getPosts(page);
            }
        }
    });
 
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            getPosts($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
 
    function getPosts(page) {
        $.ajax({
            url : '?page=' + page,
            dataType: 'json',
        }).done(function (data) {
            $('.applicantList').html(data);
            location.hash = page;
        }).fail(function () {
            alert('Applicants could not be loaded.');
        });
    }
</script>
@endsection
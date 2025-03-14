const Api = {
    Home: {}
};
(() => {
    $.ajaxSetup({
        headers: { 
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
        },
        crossDomain: true
    });
})();


Api.Home.ShortenUrl = (url) => $.ajax({
    url: '/shorten',
    method: 'POST',
    data: {url}
});



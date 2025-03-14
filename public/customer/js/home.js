const View = {
    init: function () {
        $('#shorten-btn').on('click', function (e) {
            e.preventDefault();
            const url = $('#url').val();

            if (!url || !View.isValidUrl(url)) {
                alert('Please enter a valid URL!');
                return;
            }

            View.shortenUrl(url);

            console.log(url);
        });
    },
    shortenUrl: function (url) {
        Api.Home.ShortenUrl(url).done((response) => {
           if (response.status == 'success') {
               const shortLink = response.shortened_url;
              $('#shortenedLink').html(`
              <div class='alert alert-success mt-3'>
                  Link rút gọn: <a href='${shortLink}' target='_blank'>${shortLink}</a>
              </div>`);
           }
        });
    },
    isValidUrl: function (url) {
        return url.match(/^(http:\/\/|https:\/\/)?([a-z0-9-]+\.)+[a-z]{2,}(\/[^\s]*)?$/i) || url.match(/^http:\/\/(\d{1,3}\.){3}\d{1,3}(\/[^\s]*)?$/i);
    }
    
    
    
}

$(document).ready(function () {
    View.init();
});
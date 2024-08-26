function rateMedia(mediaId, rate, numStar, starWidth) {
    console.log(typeof numStar)
    $('#' + mediaId + ' .star_bar #star' + rate).removeAttr('onclick');
    $('.box' + mediaId).html('<img src="design/loader-small.gif" alt="" />');
    var data = { mediaId: mediaId, rate: rate };
    $.ajax({
        type: 'POST',
        url: './ajax/star-rating-tuto.php',
        data: data,
        dataType: 'json',
        timeout: 3000,
        success: function (data) {
            $('.box' + mediaId).html('<div style="font-size: small; color: green">Acess rating!!! </div>');
            $('.resultMedia' + mediaId).html('<div style="font-size: small; color: grey">Note : ' + data.avg + '/' + numStar + ' (' + data.nbrRate + ' votes) ');
            var nbrPixelsInDiv = numStar * starWidth;
            var numEnlightedPX = Math.round(nbrPixelsInDiv * data.avg / numStar);
            $('#' + mediaId + ' .star_bar').attr('style', 'width:' + nbrPixelsInDiv + 'px; height:' + starWidth + 'px; background: linear-gradient(to right, #ffc600 0%,#ffc600 ' + numEnlightedPX + 'px,#ccc ' + numEnlightedPX + 'px,#ccc 100%);');
            $.each($('#' + mediaId + ' .star_bar > div'), function () {
                $(this).removeAttr('onmouseover onclick');
            });
        },
        error: function () {
            $('#box').text('Problem');
        }
    });
}

function overStar(mediaId, myRate, numStar) {
    for (var i = 1; i <= numStar; i++) {
        if (i <= myRate) $('#' + mediaId + ' .star_bar #star' + i).attr('class', 'star_hover');
        else $('#' + mediaId + ' .star_bar #star' + i).attr('class', 'star');
    }
}

function outStar(mediaId, myRate, numStar) {
    for (var i = 1; i <= numStar; i++) {
        $('#' + mediaId + ' .star_bar #star' + i).attr('class', 'star');
    }
}
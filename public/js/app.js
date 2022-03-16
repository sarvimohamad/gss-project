$(document).ready(function () {

        $('select[name="province"]').change(function(){
            const stateId = $(this).val();
            const url = `/provinces/${stateId}/cities`
            $.get(url).then(function(response) {
                $('.cityItem').remove()
                $.each(response, function(index, value) {
                    var opt = $("<option>")
                    opt.attr('value',value.id)
                    opt.addClass('cityItem')
                    opt.html(value.name)
                    $('select[name="city"]').append(opt)
                });
                $('select[name="city"]').prop("selected", false)
            })
        }).trigger('change')

    $('#refresh-captcha').click(function () {
        console.log('meysam')
        var link = $('#refresh-captcha').attr('rel') + Math.random();
        var img = $("<img>");
        img.attr('src', link)
        $('.captcha img').remove()
        $('.captcha').prepend(img)
    })

    $('.focus-me').focus();

    $('.show-pass-btn').click(function () {
        var input = $(this).next();
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
        } else {
            input.attr('type', 'password');
        }
    });

    $(document).ready(function(){
        $(".input-search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable #sid").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
});

$('.select-item').change(function (){

    var value = $(this).val()
    if(value == 'decline'){
       $('.DropDown , .textarea').show()
    }else {
        $('.DropDown').hide()
    }
});

$('.select-item').change(function (){

    var value = $(this).val()
    if(value == 3){
        $('.DropDownStatus , .textarea').show()
    }else{
        $('.DropDownStatus').hide()
    }
}).trigger('change');




'use strict'
$(function(){
    $("form").submit(function(event){
        event.preventDefault()
        const data = $(this).serialize();
        $.post('api/', {data}).done(function(res){
            alert('Ваша заявка принята');
        }).fail(function(){
            alert('Произошла ошибка');
        })
    })
})

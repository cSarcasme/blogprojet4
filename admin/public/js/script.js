$( document ).ready(function() {
    if($('#commentNew').text() == '0 nouveaux commentaires'){
        $('#commentNew').hide();
    }

    if($('#commentNewSignal').text() == ' 0 commentaires signalés'){
        $('#commentNewSignal').hide();
    }
    /*click on signal comment*/
    $('.icone').click(function(){
        $('.ico').css('color','red');
    })

});
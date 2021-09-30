var x = 0;
$( document ).ready(function() {
    $('#experience').on('keyup', function(){
        x = this.value;
    });
    $("#sinolo input").attr('placeholder', 'Experience(in years) *');
    $("#inc").on('click',function(){
        x = Number(x) + Number(0.1);
        $('#experience').val(x.toFixed(1));
    });
    $("#dec").on('click',function(){
        if(x >= 0.1){
            x = Number(x) - Number(0.1);
        }
        if(x <= 0 || x == 0.0){
            $('#experience').val(0);
        }else{
            $('#experience').val(x.toFixed(1));
        }
    });
 });
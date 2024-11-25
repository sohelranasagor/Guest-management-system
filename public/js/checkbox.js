// listen for click on checkbox
// $('#select-all').click(function(){
//     if(this.checked){
//         $(':checkbox').each(function(){
//             this.check = true;
//         });
//     }
//     else{
//         $(':checkbox').each(function(){
//             this.check = false;
//         });
//     }
// });

$('#selectAll').click(function(event) {
    if (this.checked) {
      $(':checkbox').prop('checked', true);
    } else {
      $(':checkbox').prop('checked', false);
    }
  });
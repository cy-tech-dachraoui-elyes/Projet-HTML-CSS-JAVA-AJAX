
function maxChoix(){
    var max = 4;
    var cb = document.querySelectorAll('input[type=checkbox]');

    for (var i = 0; i < cb.length; i++) {
        cb[i].onclick = function(){
        var count = document.querySelectorAll('input[type=checkbox]:checked').length;

        if (count > max) {
          alert("Vous ne pouvez choisir que " + max + " options.");
          this.checked = false;
        }
      }
    }
}

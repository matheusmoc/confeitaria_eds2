
var incrementButton = document.getElementsByClassName('btn-inc');
var decrementButton = document.getElementsByClassName('btn-dec');


for (var i = 0; i < incrementButton.length; i++) {
    var button = incrementButton[i];
    button.addEventListener('click', function (event) {

        var buttonClicked = event.target;
        //console.log(buttonClicked);
        var input = buttonClicked.parentElement.children[1];
        //console.log(input);
        var inputValue = input.value;
        var newValue = parseInt(inputValue) + 1;

        input.value = newValue;

        if (newValue > 3) {
            input.value = 3;
            alertify.alert('Por favor, compre apenas um máximo de 3 produtos!!').set('frameless', true);
        } else {
            input.value = newValue;
        }


    })
}

for (var i = 0; i < decrementButton.length; i++) {
    var button = decrementButton[i];
    button.addEventListener('click', function (event) {
        var buttonClicked = event.target;
        var input = buttonClicked.parentElement.children[1];
        var inputValue = input.value;
        var newValue = parseInt(inputValue) - 1;

        if (newValue >= 1) {
            input.value = newValue;
        } else {
            input.value = 1;

        }



    })
}


$("input[name='quantity']").keyup(function () {

    var key = $(this).val();
    if (key > 30) {
        alertify.alert('Por favor, compre apenas um máximo de 30 produtos!!').set('frameless', true);
    }
})

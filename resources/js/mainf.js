/*window.tgl= function () {
    var t = document.getElementById("switch");
    if (t.value == "on") {
        t.value = "off";
    } else if (t.value == "off") {
        t.value = "on";
    }
}*/

/*export default tgl;*/


function tgl () {
    var t = document.getElementById("switch");
    if (t.value == "on") {
        t.value = "off";
    } else if (t.value == "off") {
        t.value = "on";
    }
}

function submit () {
    $(function ()
    {
        $("#form2").on('change', function ()
        {
            if (document.getElementById("switch").checked)
            {
                $("#form2").submit();
            }
            else
            {
                e.preventDefault();
                alert('Please check the box before submitting the form');
            }
        });
    });
}
/*
function submit () {
    var t = document.getElementById("switch");
    if (t.value == "on") {

    } else if (t.value == "off") {
        console.log($("#switch").val());
        $('#form2').submit();
    }

}*/

document.addEventListener("DOMContentLoaded", function(ev){

    // Get the checkbox element
    const checkBoxSwitch = document.getElementById('switch');

    // Attach an event handler to the checkox
    checkBoxSwitch.addEventListener("change", function(e){

        // In case the checkbox is checked
        if(checkBoxSwitch.checked === true) {

        }
        // In case the checkbox is not checked
        else {
            console.log($("#switch").val());
            $('#form2').submit();
        }
    });
});







window.tgl = tgl;
window.submit = submit;

export default tgl;
//به شکل عجیبی اگر اکسپورت پایین رو ننویسی هم عمل میکنه
export {submit};


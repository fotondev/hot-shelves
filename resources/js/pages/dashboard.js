/*Toggle dropdown list*/
$(document).ready(function ($) {
    $("#drop-button").on('click', function () {
        $("#myDropdown").toggle();
    });

    $("#i-1").on('click', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "/placements",
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $.each(data, function(key, value){
                    $('#place').append(value.first_name);
                })
                
                             
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
    $("#i-2").on('click', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "/cars",
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $.each(data, function(key, value){
                    $('#place2').append(value.name);
                })
                
                             
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

});



// function toggleDD(myDropMenu) {
//     document.getElementById(myDropMenu).classList.toggle("invisible");
// }
// /*Filter dropdown options*/
// function filterDD(myDropMenu, myDropMenuSearch) {
//     var input, filter, ul, li, a, i;
//     input = document.getElementById(myDropMenuSearch);
//     filter = input.value.toUpperCase();
//     div = document.getElementById(myDropMenu);
//     a = div.getElementsByTagName("a");
//     for (i = 0; i < a.length; i++) {
//         if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
//             a[i].style.display = "";
//         } else {
//             a[i].style.display = "none";
//         }
//     }
// }
// // Close the dropdown menu if the user clicks outside of it
// window.onclick = function(event) {
//     if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
//         var dropdowns = document.getElementsByClassName("dropdownlist");
//         for (var i = 0; i < dropdowns.length; i++) {
//             var openDropdown = dropdowns[i];
//             if (!openDropdown.classList.contains('invisible')) {
//                 openDropdown.classList.add('invisible');
//             }
//         }
//     }
// }
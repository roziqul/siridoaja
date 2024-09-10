/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

function toggleNav(navLink, dropdown) {
    var nav = '#nav-';
    
    $(nav + '1').removeClass('active');
    $(nav + '2').removeClass('active');
    $(nav + '3').removeClass('active');
    $(nav + '4').removeClass('active');
    $(nav + '5').removeClass('active');

    for (let i = 1; i <= 4; i++) {
        $(nav + '2-' + i).removeClass('active');
    }
    for (let i = 1; i <= 2; i++) {
        $(nav + '3-' + i).removeClass('active');
    }
    for (let i = 1; i <= 8; i++) {
        $(nav + '4-' + i).removeClass('active');
    }

    if (dropdown) {
        $(nav + dropdown + '-' + navLink).addClass('active');
        $(nav + dropdown).addClass('active');
    } else {
        $(nav + navLink).addClass('active');
    }
}

function loadPage(page, navLink, dropdown) {
    toggleNav(navLink, dropdown);
    $('#loader').fadeIn();
    $('#main-content').load('/pages/' + page, function () {
        $('#loader').fadeOut();
    });
}

$(document).ready(function () {
    loadPage('dashboard.php', 1);
});

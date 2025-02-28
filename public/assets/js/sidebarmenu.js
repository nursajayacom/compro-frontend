/*
Template Name: Admin Template
Author: Wrappixel

File: js
*/
// ==============================================================
// Auto select left navbar
// ==============================================================

$(function () {
    var url = window.location.pathname; // Ambil hanya path tanpa host

    // Daftar prefix yang ingin diperiksa
  var prefixes = ["/products", "/categories", "/dashboard"];

  // Filter elemen yang href-nya benar-benar cocok dengan URL saat ini atau prefix-nya cocok
  var element = $("ul#sidebarnav a").filter(function () {
    var href = new URL(this.href, window.location.origin).pathname;

    return href === url || prefixes.some(prefix => url.startsWith(prefix) && href.startsWith(prefix));
  });

  // Tambahkan class active dan selected pada elemen yang cocok
  element.each(function () {
    $(this).addClass("active");
    $(this).parentsUntil(".sidebar-nav").each(function () {
      if ($(this).is("li") && $(this).children("a").length !== 0) {
        $(this).children("a").addClass("active");
        $(this).addClass("selected");
      } else if (!$(this).is("ul") && $(this).children("a").length === 0) {
        $(this).addClass("selected");
      } else if ($(this).is("ul")) {
        $(this).addClass("in");
      }
    });
  });
  $("#sidebarnav a").on("click", function (e) {
    if (!$(this).hasClass("active")) {
      // hide any open menus and remove all other classes
      $("ul", $(this).parents("ul:first")).removeClass("in");
      $("a", $(this).parents("ul:first")).removeClass("active");

      // open our new menu and add the open class
      $(this).next("ul").addClass("in");
      $(this).addClass("active");
    } else if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this).parents("ul:first").removeClass("active");
      $(this).next("ul").removeClass("in");
    }
  });
  $("#sidebarnav >li >a.has-arrow").on("click", function (e) {
    e.preventDefault();
  });
});

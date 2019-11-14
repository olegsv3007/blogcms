if (select = document.querySelector("#qty_items")) {
    select.addEventListener("change", function() {
         let form = document.querySelector("#qty_items_per_page_form");
         form.submit();
    });
}

if (select = document.querySelector("#view_state")) {
    select.addEventListener("change", function() {
         let form = document.querySelector("#qty_items_per_page_form");
         form.submit();
    });
}
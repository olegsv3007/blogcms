if (select = document.querySelector("#qty_items")) {
    select.addEventListener("change", function() {
         let form = document.querySelector("#qty_items_per_page_form");
         form.submit();
    });
}
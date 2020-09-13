
let id = $("input[name*='movie_id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    console.log("working")
    let textvalues = displayData(e);

    ;
    let bookname = $("input[name*='movie_name']");
    let bookpublisher = $("input[name*='movie_actor']");
    let bookprice = $("input[name*='rel_year']");

    id.val(textvalues[0]);
    bookname.val(textvalues[1]);
    bookpublisher.val(textvalues[2]);
    bookprice.val(textvalues[3].replace("$", ""));
});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
           textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}
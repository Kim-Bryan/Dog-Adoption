//btn to display data to edit
$(".btnedit").click(e =>{
    let textValues = displayData(e);
    
    let id = $("input[name*='dogId']");
    let image = $("input[name*='dogImage']");
    let name = $("input[name*='dogName']");
    let breed = $("input[name*='dogBreed']");
    let gender = $("input[name*='dogGender']");
    let age = $("input[name*='age']");
    let weight = $("input[name*='weight']");
    let height = $("input[name*='height']");
    let price = $("input[name*='price']");

    name.val(2);

});
function displayData(e){
    let id=0;
    const td = $("#tbody tr td");
    let textValues = [];

    for(const value of td){
        if(value.dataset.id == e.target.dataset.id){
            textValues[id++] = value.textContent;
        }
    }
    return textValues;
}

function hideAdddog() {
    var x = document.getElementById("hides");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
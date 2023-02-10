// user will enter Reviews from here to the local storage
let addbtn = document.getElementById('addBtn');

    addbtn.addEventListener('click', function (e) {
        let addTitle = document.getElementById("addTitle")
        let addTxt = document.getElementById("addText")
        let Reviewstitle = localStorage.getItem("Reviewstitle")
        let Reviews = localStorage.getItem("Reviews");
        if (Reviews == null) {
            ReviewsArray = [];
        }
        else {
            ReviewsArray = JSON.parse(Reviews);
        }
        let Obj = {
            title: addTitle.value,
            text: addTxt.value
        }
        ReviewsArray.push(Obj);
        localStorage.setItem("Reviews", JSON.stringify(ReviewsArray));
        addTxt.value = "";
        addTitle.value = "";
        console.log(ReviewsArray);
        showReviews();
    });
// function to display the Reviews

function showReviews() {
    let Reviews = localStorage.getItem('Reviews')
    if (Reviews == null) {
        ReviewsArray = [];
    }
    else {
        ReviewsArray = JSON.parse(Reviews);
    }
    let html = ""
    ReviewsArray.forEach(function (element, index) {
        html += `<div class="Reviewscard my-2 mx-2 card" style="width: 18rem;" value="0">
        <div class="card-body">
          <label for="card-title" style="font-size:20px;font-weight:bold;">Name:</label>
          <h5 class="card-title">${element.title}</h5>
          <label for="card-text" style="font-size:20px;font-weight:bold;">Review:</label>
          <p class="card-text">${element.text}</p>
          <button id = "${index}" onclick="deleteNote(this.id)" class="btn btn-primary">Delete</button>
         
        </div>
      </div>`
    });


    let ReviewsElement = document.getElementById('Reviews');
    if (ReviewsArray.length != 0) {
        ReviewsElement.innerHTML = html;
    }
    else {
        ReviewsElement.innerHTML = `<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Nothing to show now . Add Reviews to show them!
        </div>
      </div>`
    }
}
function deleteNote(index) {
    console.log('this item with index', index, ' will be deleted')
    let Reviews = localStorage.getItem('Reviews')
    if (Reviews == null) {
        ReviewsArray = [];
    }
    else {
        ReviewsArray = JSON.parse(Reviews);
    }
    ReviewsArray.splice(index, 1);
    localStorage.setItem("Reviews", JSON.stringify(ReviewsArray));
    showReviews();
}

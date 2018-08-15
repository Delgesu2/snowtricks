/* Show more tricks landing page script */

// cache vars

var parent = document.querySelector('#container'),
    items  = parent.querySelectorAll('#row'),
    loadMoreBtn =  document.querySelector('#load-more-tricks'),
    maxItems = 1,
    hiddenClass = "visually-hidden";


[].forEach.call(items, function(item, idx){
    if (idx > maxItems - 1) {
        item.classList.add(hiddenClass);
    }
});

loadMoreBtn.addEventListener('click', function(){

    [].forEach.call(document.querySelectorAll('.' + hiddenClass), function(item, idx){
        console.log(item);
        if (idx <= maxItems - 1) {
            item.classList.remove(hiddenClass);
        }

        if ( document.querySelectorAll('.' + hiddenClass).length === 0) {
            loadMoreBtn.style.display = 'none';
        }

    });

});

var modal = document.querySelector('.modal');
modal.addEventListener('click', function(event) {
    event.stopPropagation();
    modal.classList.toggle('is-active');
});


/* Show loaded images in HTML */
function showFiles() {
    var files = document.getElementById("create_trick_photo").files;
    var output = [];

    for (var i=0; i<files.length; i++) {
        var content=document.createTextNode(files[i].name);
        var side=document.getElementById("loadedFiles");
        side.appendChild(content);
        }
}

/* Load more videos */

// + and - icons
   // let plusIcon = document.getElementById("btnNewVideo");
   // let minusIcon = document.getElementById("btnDelVideo");

    let buttons = document.getElementById("buttons");
    let index = document.querySelector('#collection').getAttribute('data-index');

    // Add new video form field
function newVideo() {

        //get data-prototype
        let prototype = document.querySelector('#collection').getAttribute('data-prototype');
        let newForm = prototype.replace(/__name__/g, index);
        //let videoForm = document.querySelector('#url-field');

        document.querySelector('#collection').setAttribute('data-index', index);

       // Display the form
        buttons.insertAdjacentHTML('afterend', newForm);

        index++;
    }

    // Remove video field
function removeField() {
    // get the div that holds the collection
    var collectionHolder = document.getElementById('collection');
    // field followed by icon +
    var newLinkLi = document.getElementById('url-field').insertAdjacentHTML('afterend', plusIcon);

    // add a 'delete' link to all of the existing form elements    N'IMPORTE QUOI !
   // var elements = collectionHolder.querySelectorAll("li");

    Array.prototype.forEach.call(elements, function () {

        minusIcon.addEventListener("click", function (e) {

            e.preventDefault();
            // remove the field
            newLinkLi.parentNode.removeChild(newLinkLi);
        });
    });
}

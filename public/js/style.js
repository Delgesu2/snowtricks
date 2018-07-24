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
    var files = document.getElementById('create_trick_picture').files;

    for (var i=0; i<files.length; i++) {
        var content=document.createTextNode(files[i].name);
        var side=document.getElementById("loadedFiles");
        side.appendChild(content);
        }
}


/* Load more videos */

// "add a field" icon

    var oSpan = document.createElement("SPAN");
    var oElem = document.createElement("I");

    oSpan.className = "icon is-medium";
    oElem.className = "far fa-plus-square";

    plusIcon = oSpan.appendChild(oElem);

    /** ALTERNATIF
     var html='<span class="icon is-medium"><i class="far fa-plus-square"></i></span>\n';
     var li=document.createElement('li');
     var plusIcon = li.insertAdjacentHTML("beforeend", html);
     **/

// get the ul that holds the collection
    var collectionHolder = document.getElementById('collection');

// add "add a field" to the ul
    collectionHolder.appendChild(plusIcon);

// new index = current form input when inserting new item

 let index = collectionHolder.querySelector('input').length;
    collectionHolder.getAttribute('data-index');


// add new video form field
    plusIcon.addEventListener("click", addField());

    function addField(collectionHolder, li) {  // définir 'li'
        //get data-prototype
        //var prototype = collectionHolder.data('prototype');
        var prototype = collectionHolder.getAttribute('prototype');
        // get new index
        //var index = collectionHolder.data('index');
        var index = collectionHolder.getAttribute('data-index');

        var newForm = prototype;

        /**
        newForm = newForm.replace(/__name__/g, index);
         Mais non, parce que j'ai mis 'label' => false dans CreateTrickType
         **/

        // increase index
        //collectionHolder.data('index', index + 1);
        var oldIndex = collectionHolder.getAttribute('index').selectedIndex;
        var newIndex = oldIndex + 1;  // ??

        // Display the form
        var newFormLi = li.appendChild(newForm);
        plusIcon.insertBefore(newFormLi);

    }


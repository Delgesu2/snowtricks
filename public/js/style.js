/* Load more videos */

// + and - icons
    let plusIcon = document.getElementById("btnNewVideo");
    let minusIcon = document.getElementById("btnDelVideo");

    let buttons = document.getElementById("buttons");
    let index = document.querySelector('#collection').getAttribute('data-index');

    // Add new video form field

plusIcon.addEventListener('click', function (e) {
    e.preventDefault();
//function newVideo() {

    console.log(document.querySelector('#collection').getAttribute('data-prototype'));

        //get data-prototype
        let prototype = document.querySelector('#collection').getAttribute('data-prototype');
        let newForm = prototype.replace(/__name__/g, index);

        //let videoForm = document.querySelector('#url-field');

        document.querySelector('#collection').setAttribute('data-index', index);

       // Display the form
        buttons.insertAdjacentHTML('afterend', newForm);

        index++;
    });

    // Remove video field
function removeField() {
    // get the div that holds the collection
    var collectionHolder = document.getElementById('collection');
    // field followed by buttons
    //var newLinkLi = document.getElementById('url-field').insertAdjacentHTML('afterend', buttons);

    // add a 'delete' link to all of the existing form elements    N'IMPORTE QUOI !
   // var elements = collectionHolder.querySelectorAll("li");

    //Array.prototype.forEach.call(elements, function () {

        //minusIcon.addEventListener("click", function (e) {

            //e.preventDefault();
            // remove the field

    var
            newLinkLi.parentNode.removeChild(newLinkLi);
        //});
   // });
}

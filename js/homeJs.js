
var viewBookId = 0;

function viewBook(item)
{
    viewBookId += 1;
    
    var selectedItem = document.createElement('div');
    selectedItem.classList.add('bookImg');
    selectedItem.setAttribute('id', viewBookId);

    var img = document.createElement('img');
    img.setAttribute('src', item.children[0].currentSrc);

    var bookItem = document.getElementById('view');

    selectedItem.append(img);
    bookItem.append(selectedItem);

}
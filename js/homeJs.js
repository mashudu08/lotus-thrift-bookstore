
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

function addToCart(item)
{
    var noti = document.querySelector('fa-cart-shopping');
    var books = document.querySelector('books');
    var button = document.querySelector('button');

    for(but of button)
    {
        but.addEventListener('click', (e)=>{var add = Number(noti.getAttribute('data-count') || 0);
        noti.setAttribute('data-count', add + 1);
        noti.classList.add('zero');
        })
    }
}

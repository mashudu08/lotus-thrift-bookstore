
//book preview.
let previewContainer = document.querySelector('.books-preview');
let previewBlock =document.querySelectorAll('.preview');

document.querySelectorAll('.books').forEach(book =>{
    book.onclick = () =>{
        previewContainer.style.display = 'flex';
        let name = b.getAttribute('data-name');
        previewBlock.forEach(preview =>{
            let target = p.getAttribute('data-target');
            if(name == target)
            {
                preview.classList.add('active');
            }
        });
    };
});

//closing book preview.
previewBlock.forEach(close =>{
    close.querySelector('.fa-times').onclick = () =>{
        close.classList.remove('active');
        previewContainer.style.display = 'none';
    };
});

/*var viewBookId = 0;

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
    viewBookId += 1;
    
    var selectedItem = document.createElement('div');
    selectedItem.classList.add('bookImg');
    selectedItem.setAttribute('id', viewBookId);

    var img = document.createElement('img');
    img.setAttribute('src', item.children[0].currentSrc);

    var bookItem = document.getElementById('view');

    selectedItem.append(img);
    bookItem.append(selectedItem);
}*/

/*function addToCart(item)
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
}*/

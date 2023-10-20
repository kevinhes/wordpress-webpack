const editorH3 = document.querySelectorAll('.editor-content h3');
// const editorH4 = document.querySelectorAll('.editor-content h4');
const postList = document.querySelector('.post-list');

let anchorTitle = [];

// editorH3.forEach((h3, index) => {
//   h3.setAttribute('id', `anchor-${index}`);
//   anchorTitle.push(h3.textContent);
// });

// anchorTitle.forEach((title, index) => {
//   postList.innerHTML += `<li><a href="#anchor-${index}" class="text-dark mb-2">${title}</a></li>`;
// } );

// 找到所有的 h3

let anchorIndex = 0;

editorH3.forEach((h3, index) => {
    h3.setAttribute('id', `anchor-${anchorIndex}`);
    anchorTitle.push({
      title: h3.textContent,
      index: anchorIndex,
      sublist: [],
    });
    anchorIndex++;

    let nextSibling = h3.nextElementSibling;
    let editorH4 = [];
    // 檢查每一個後面的兄弟元素，直到找到另一個 h3
    while (nextSibling && nextSibling.tagName !== 'H3') {
        if (nextSibling.tagName === 'H4') {
            nextSibling.setAttribute('id', `anchor-${anchorIndex}`);
            editorH4.push(nextSibling);
            anchorTitle[index].sublist.push({
              title: nextSibling.textContent,
              index: anchorIndex,
            });
            anchorIndex++;
        }
        nextSibling = nextSibling.nextElementSibling;
    }
});

console.log(anchorTitle);

// anchorTitle.forEach((title, index) => {
//   if (title.sublist.length > 0) {
//     let str = '';
//     const subMenu = document.createElement('ul');
//     subMenu.classList.add('sub-menu');
//     title.sublist.forEach((subTitle, subIndex) => {
//       str += `
//       <li class="pe-3">
//         <a href="#anchor-${subTitle.index}" class="text-dark">
//           ${subTitle.title}
//         </a>
//       </li>
//       `
//     });
//     subMenu.innerHTML = str;

//     postList.innerHTML += `<li class="ms-3"><a href="#anchor-${index}" class="text-dark mb-2">${title.title}</a>＄${subMenu}</li>`;
//   } else {
//     postList.innerHTML += `<li><a href="#anchor-${index}" class="text-dark mb-2">${title.title}</a></li>`;
//   }
// });

anchorTitle.forEach((title) => {
  const listItem = document.createElement('li');
  listItem.classList.add('mb-2')
  // 主要的 h3 鏈接
  const mainLink = document.createElement('a');
  mainLink.href = `#anchor-${title.index}`;
  mainLink.className = "text-dark";
  mainLink.textContent = title.title;
  listItem.appendChild(mainLink);

  if (title.sublist.length > 0) {
    const subMenu = document.createElement('ol');
    subMenu.classList.add('sub-menu');

    title.sublist.forEach((subTitle) => {
      const subListItem = document.createElement('li');
      subListItem.className = 'ps-3';
      
      const subLink = document.createElement('a');
      subLink.href = `#anchor-${subTitle.index}`;
      subLink.className = "text-dark";
      subLink.textContent = subTitle.title;
      
      subListItem.appendChild(subLink);
      subMenu.appendChild(subListItem);
    });
    
    listItem.appendChild(subMenu);
  }
  
  postList.appendChild(listItem);
});

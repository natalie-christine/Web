const serviceContainer = document.getElementById('selected-service');

const products = [
    {name: "Wash Car", price: 10},
    {name: "Mow Lawn", price: 20},
    {name: "Pull Weeds", price: 30}
]

const selectedServices = []

function addProduct(productId) {
    const duplicate = checkName(products[productId].name);
    if (!duplicate) {
        selectedServices.push(products[productId]);
        console.log(selectedServices)
        updateInvoice();
    }
}

function checkName(productName) {
    for (let i = 0; i < selectedServices.length; i++) {
        if(productName === selectedServices[i].name) {
            return true;
        }
    }
    return false;
}


function updateInvoice() {
    let sum = 0;
    while (serviceContainer.lastChild) {
        serviceContainer.lastChild.remove();
    }
    for (let i = 0; i < selectedServices.length; i++) {
        const tr = document.createElement("tr");
        const tdELleft = document.createElement("td");
        tdELleft.textContent = selectedServices[i].name;
        tdELleft.classList.add('left');

        let spanEL = document.createElement('span');
        spanEL.textContent = 'delete';
        spanEL.classList.add('delete');
        spanEL.addEventListener('click', () => deleteService(selectedServices[i].name));

        let tdELright = document.createElement("td");
        tdELright.textContent = "$ " + selectedServices[i].price;
        tdELright.classList.add('right');

        tr.appendChild(tdELleft);
        tdELleft.appendChild(spanEL);
        tr.appendChild(tdELright);
        serviceContainer.appendChild(tr);
        sum += selectedServices[i].price;
    }

    const sumEl = document.getElementById('sum-el');
    sumEl.textContent = `$ ${sum}`;
}

updateInvoice()

function deleteService(serviceName) {
    console.log("deleted")
    console.log(serviceName)
    const i = selectedServices.findIndex(({name}) => name === serviceName);
    console.log(i)
    if (i > -1) { // only splice array when item is found
        selectedServices.splice(i, 1); // 2nd parameter means remove one item only
    }
    updateInvoice();
}


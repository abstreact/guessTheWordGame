//SELECTORS
let score = 0;
let foul = 0;
let countNext = 0;
let isCorrect = false;
let scoreElement = document.querySelector('.score');
let wordToGuess = document.querySelector('.wordToGuess');
let wordInput = document.querySelector('.input-container');
let letterContainerDIV = document.querySelector('.letter-container');
let pointsText = document.querySelector('.points');
let slider = document.querySelector('.slider');
scoreElement.innerText = score;
let emptyWord = document.querySelector('.empty');
let tickImg = document.querySelector('.tick');
let crossImg = document.querySelector('.cross');
let words = [];
let checkButton = document.querySelector('.checkButton');
checkButton.disabled = true;
let generateButton = document.querySelector('.generateWord');
let correctWord = "";
pointsText.innerText = slider.value;
let inputContainer = document.querySelector('.input-container');
let inputLetters = document.getElementsByClassName("inputLetters");
//Event Listeners
function moveToNextInput() {

}

document.addEventListener('DOMContentLoaded', assignWordsList());
//document.addEventListener('DOMContentLoaded',assignWordsList(getRandomWords()));
document.addEventListener('DOMContentLoaded', fillLetters('welcome'));

slider.addEventListener('click', type);
generateButton.addEventListener('click', generateWord);
checkButton.addEventListener('click', checkWord);
wordInput.addEventListener('click', empty);
wordInput.addEventListener("keyup", function (event) {
    // Number 13 is the "Enter" key on the keyboard
    if (event.keyCode === 13) {
        // Cancel the default action, if needed
        event.preventDefault();
        // Trigger the button element with a click
        checkButton.click();
    }
});

//todoList.addEventListener('click', deleteCheck);
//filterOption.addEventListener('click', filterTodo);

//Functions

function empty() {
    emptyWord.hidden = true;
}

function type() {

    pointsText.innerText = slider.value;
    //console.log(slider.value);

};

String.prototype.shuffle = function () {
    var a = this.split(""),
        n = a.length;

    for (var i = n - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var tmp = a[i];
        a[i] = a[j];
        a[j] = tmp;
    }
    return a.join("");
}

function fillLetters(word) {
    //<input type="text" class="letter">
    let wordLength = word.length;
    console.log()
    clearBox();
    if (isCorrect === false) {
        for (let index = 0; index < wordLength - 1; index++) {
            const createInput = document.createElement('input');
            createInput.setAttribute("type", "text");
            createInput.setAttribute("class", "letter");
            letterContainerDIV.appendChild(createInput);

        }

        const createInput = document.createElement('input');
        createInput.setAttribute("type", "text");
        createInput.setAttribute("class", "letter");
        letterContainerDIV.appendChild(createInput);

        const getLetters = document.getElementsByClassName("letter");

        for (let index = 0; index < getLetters.length; index++) {
            //console.log(getLetters[index].innerText = word.charAt(index));
            getLetters[index].value = word.charAt(index);
        }
    }

    let leTT = document.querySelector('.letter');
    leTT.addEventListener('animationend', function () {
        tickImg.hidden = true;
    })
}

function fillAnswer(word) {
    let wordLength = word.length;
    clearBox();

    // <div class="body-second">
    //             <form class="input-container">
    //                 <input class="inputLetters" maxlength = "1"></input>

    if (isCorrect === false) {
        for (let index = 0; index < wordLength - 1; index++) {
            const createInput = document.createElement('input');
            createInput.setAttribute("maxlength", "1");
            createInput.setAttribute("class", "inputLetters");
            createInput.setAttribute("onkeypress", "moveToNextInput()");
            createInput.setAttribute("id", index);
            inputContainer.appendChild(createInput);
        }

        const createInput = document.createElement('input');
        createInput.setAttribute("maxlength", "1");
        createInput.setAttribute("class", "inputLetters");
        createInput.setAttribute("onkeypress", "moveToNextInput()");
        createInput.setAttribute("id", wordLength - 1);
        inputContainer.appendChild(createInput);

        const getLetters = document.getElementsByClassName("inputLetters");


        //Gjenerimi numrave Random per sa shkronja me i plotsu
        //console.log(getLetters[index].innerText = word.charAt(index));
        const nums = pick(getLetters.length / 2, 0, getLetters.length - 1);
        //console.log(nums);
        for (let index = 0; index < getLetters.length; index++) {
            if (nums.includes(index)) {
                getLetters[index].value = word.charAt(index);
                getLetters[index].disabled = true;
                getLetters[index].setAttribute("disabled", "1");
            }
        }
    }
}

function moveToNextInput() {
    let activeElement = document.activeElement
    //let nextElement = querySelector('input[]');
    let activeId = activeElement.attributes[3];
    console.log("Active id: " + activeId.value)
    //document.getElementById("2");
    countNext = parseInt(activeId.value) + 1;
    console.log("CountNext: " + countNext);
    // let nextElement = querySelector('inputLetters[0].attributes[3]');
    //let nextElement = inputLetters[0].attributes[3];
    //console.log(countNext)
    let input = document.getElementById(countNext);
    let inputPlusOne = document.getElementById(countNext + 1);
    console.log(countNext + 1);
    console.log(countNext + 2)
    let inputDisabled = input.getAttribute("disabled") === "1";
    let inputDisabledPlusOne = inputPlusOne.getAttribute("disabled") === "1";
    console.log(inputDisabled)
    console.log(inputDisabledPlusOne)


    if (inputDisabled && inputDisabledPlusOne) {
        input = document.getElementById(countNext + 2);
    } else if (inputDisabled) {
        input = document.getElementById(countNext + 1);
    }


    input.value = "";
    input.focus();
    input.select();
    //console.log(activeElement.attributes[3]);
    //console.log(nextElement);
}

function getInput() {
    const getLetters = document.getElementsByClassName("inputLetters");
    let word = "";
    for (let index = 0; index < getLetters.length; index++) {
        if (getLetters[index].value === "") {
            word += "_";
        }
        word += getLetters[index].value;
    }
    return word;
}

//Generates random num of numbers
function pick(n, min, max) {
    var values = [], i = max;
    while (i >= min) values.push(i--);
    var results = [];
    var maxIndex = max;
    for (i = 1; i <= n; i++) {
        maxIndex--;
        var index = Math.floor(maxIndex * Math.random());
        results.push(values[index]);
        values[index] = values[maxIndex];
    }
    return results;
}


function clearBox() {
    letterContainerDIV.innerHTML = "";
}

/*REFERENCE
function reference(){
    const todoDiv = document.createElement('div');
    todoDiv.classList.add("todo");
    //Create LI
    const newTodo = document.createElement('li');
    //Set text of LI
    newTodo.innerText = todoInput.value;
    //Add a class name to the newTodo-li
    newTodo.classList.add('todo-item');
    //add the LI to the DIV created above as a child
    todoDiv.appendChild(newTodo);
    //ADD TO DO TO LOCAL STORAGE
    saveLocalTodos(todoInput.value);
    //Check mark Button
    const completedButton = document.createElement('button');
    //create a logo inside of the button that we created above
    completedButton.innerHTML = '<i class="fas fa-check"></i>'
    //add a classname to the button 
    completedButton.classList.add('complete-btn');
    //add that button to the div that we are working rn TODODIV
    todoDiv.appendChild(completedButton);
    //Check trash Button
    const trashButton = document.createElement('button');
    trashButton.innerHTML = '<i class="fas fa-trash"></i>'
    trashButton.classList.add('trash-btn');
    todoDiv.appendChild(trashButton);
    //Append DIV to List
    todoList.appendChild(todoDiv);
    
    //Clear Todoinput value
    todoInput.value="";
}
*/

/*REFERENCE
fetch(api)
    .then(data =>{
        return data.json();
    })
    .then(data =>{
        console.log(data);
        const {temp,feels_like} = data.main;
        const {description,main} = data.weather[0];
        let {name} = data;
        //Set DOM elements from the API
        tempToC = temp - 273.15;
        feels_likeToC = feels_like - 273.15;
        temperatureDegree.textContent = tempToC.toPrecision(3);
        temperatureDescription.textContent = "Feels like: " + feels_likeToC.toPrecision(3);
        console.log(name);
        locationTimezone.textContent = name;
    })
});
*/


//Generates random words from API 
async function getRandomWords() {
    //url for request

    //UNCOMMENT FOR API WORDS
    // let numOfWords = 100;
    // let url = `https://random-word-api.herokuapp.com/word?number=${numOfWords}`;

    // //Gets request and returns in Array at json
    // const response = await fetch(url);
    // const json = await response.json();
    // //console.log(json);
    // words = json;

    // let wordsArray = fetch(url)
    // .then(data =>{
    //     return data.json();
    // })
    // .then(data =>{
    //     wordsReturned = data;
    //     console.log(wordsReturned);
    //     console.log(wordsReturned[1]);
    // });
    //console.log(wordsReturned);

    return json;
}
//UNCOMMENT FOR API WORDS
//Assigns the randomGenerated words to words list
// function assignWordsList(wordsReturnedd){
//     words = wordsReturnedd;
//     return words;
// }

//
function assignWordsList() {
    words = ['deliver',
        'meddle',
        'planes'
        , 'permissible'
        , 'spotty'
        , 'impolite'
        , 'whimsical'
        , 'suck'
        , 'conscious'
        , 'lunchroom'
        , 'pray'
        , 'crowded'
        , 'mind'
        , 'frantic'
        , 'accidental'
        , 'historical'
        , 'cheerful'
        , 'substance'
        , 'smiling'
        , 'wide'
        , 'damage'
        , 'fretful'
        , 'chilly'
        , 'broken'
        , 'adventurous'
        , 'guide'
        , 'bustling'
        , 'petite'
        , 'promise'
        , 'excellent'
        , 'pale'
        , 'play'
        , 'rings'
        , 'corn'
        , 'hospital'
        , 'dog'
        , 'tested'
        , 'whip'
        , 'dramatic'
        , 'womanly'];
    return words;
}

//Gets the words and checks for length
//Picks a random word from words array and displays
function generateWord() {
    checkButton.disabled = false;

    //let wordsGenerated = getRandomWords();
    //console.log(words);


    let sliderValue = slider.value;
    //console.log(slider.value)
    let wordsPicked = [];
    let indexJashtem = 0;
    for (let i = 0; i < words.length; i++) {
        if (words[i].length == sliderValue) {

            wordsPicked[indexJashtem++] = words[i];

        }
    }
    //wordsPicked = words;

    //console.log(wordsPicked);
    let random = Math.round(Math.random() * (wordsPicked.length - 1));
    //return back to random
    wordToShuffle = wordsPicked[random];
    correctWord = wordToShuffle;
    wordToShuffle.shuffle();
    //console.log(wordToShuffle)
    for (let index = 0; index > wordToShuffle.length; index++) {
        wordToShuffle = wordToShuffle.charAt(index) + " ";

    }

    inputContainer.innerHTML = "";
    fillAnswer(wordToShuffle);
    fillLetters(wordToShuffle);
    //wordToGuess.textContent = wordToShuffle;
    wordInput.value = "";
    //console.log(wordToDisplay)

}

function clear() {
    wordInput.value = "";
}

function checkWord() {
    let wordInputed = wordInput.value;
    console.log(getInput());
    if (getInput() === correctWord) {
        console.log('GOOD');
        tickImg.hidden = false;
        generateWord();
        score++;
        isCorrect = false;
        clearBox();
        generateWord();
        foul = 0;
    } else {
        console.log('TRY AGAIN');
        crossImg.hidden = false;
        //adds a eventListener to the element and checks when the element 
        //Animation ends
        crossImg.addEventListener('animationend', function () {
            crossImg.hidden = true;
        })
        if (wordInput.value === "") {
            emptyWord.hidden = false;
        }
        if (wordInput.value !== "" && score > 0) {
            score--;
        }
        foul++;
        wordInput.value = "";
    }

    document.querySelector('.score').innerHTML = score;
    clear();

}

/*
deliver',
    'meddle',
    'planes'
    ,'permissible'
    ,'spotty'
    ,'impolite'
    ,'whimsical'
    ,'suck'
    ,'conscious'
    ,'lunchroom'
    ,'pray'
    ,'crowded'
    ,'mind'
    ,'frantic'
    ,'accidental'
    ,'historical'
    ,'cheerful'
    ,'substance'
    ,'smiling'
    ,'wide'
    ,'damage'
    ,'fretful'
    ,'chilly'
    ,'broken'
    ,'adventurous'
    ,'guide'
    ,'bustling'
    ,'petite'
    ,'promise'
    ,'excellent'
    ,'pale'
    ,'play'
    ,'rings'
    ,'corn'
    ,'hospital'
    ,'dog'
    ,'tested'
    ,'whip'
    ,'dramatic'
    ,'womanly

    '55555','666666','7777777','88888888','999999999'
*/
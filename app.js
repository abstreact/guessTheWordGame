//SELECTORS
let score = 0;
let foul = 0;
let isCorrect = false;
let scoreElement = document.querySelector('.score');
let wordToGuess = document.querySelector('.wordToGuess');
let wordInput = document.querySelector('.guessTheWord');
let letterContainerDIV = document.querySelector('.letter-container');
let pointsText = document.querySelector('.points');
let slider = document.querySelector('.slider');
scoreElement.innerText="Score: " + score;
let emptyWord = document.querySelector('.empty');
let tickImg = document.querySelector('.tick');

let words = ['deliver',
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
,'womanly'];
let checkButton = document.querySelector('.checkButton');
checkButton.disabled = true;
let generateButton = document.querySelector('.generateWord');
let correctWord = "";
pointsText.innerText = slider.value;
//Event Listeners

document.addEventListener('DOMContentLoaded',fillLetters('welcome'));


slider.addEventListener('click',type);
generateButton.addEventListener('click',generateWord);
checkButton.addEventListener('click',checkWord);
wordInput.addEventListener('click',empty);

//todoList.addEventListener('click', deleteCheck);
//filterOption.addEventListener('click', filterTodo);

//Functions

function empty(){
    emptyWord.hidden = true;
}

function type(){
    
    pointsText.innerText = slider.value;
    //console.log(slider.value);
    
};

String.prototype.shuffle = function () {
    var a = this.split(""),
        n = a.length;

    for(var i = n - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var tmp = a[i];
        a[i] = a[j];
        a[j] = tmp;
    }
    return a.join("");
}

function fillLetters(word){
    //<input type="text" class="letter">
    let wordLength = word.length;
    console.log()
    clearBox();
    if(isCorrect === false){
        for (let index = 0; index < wordLength-1; index++) {
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
    leTT.addEventListener('animationend',function(){
        tickImg.hidden=true;
    })

    
}

function clearBox(){
    letterContainerDIV.innerHTML= "";
}

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

function generateWord(){
    checkButton.disabled = false;
    let sliderValue = slider.value;
    console.log(slider.value)
    let wordsPicked = [];
    let indexJashtem = 0;
    for (let i = 0; i < words.length; i++) {
        if(words[i].length==sliderValue){
           
                wordsPicked[indexJashtem++]=words[i];
            
        }
    }

    console.log(wordsPicked);


    let random = Math.round(Math.random() * (wordsPicked.length-1));
    wordToShuffle = wordsPicked[random];
    correctWord = wordToShuffle;
    wordToShuffle.shuffle();
    console.log(wordToShuffle)
    for (let index = 0; index > wordToShuffle.length; index++) {
        wordToShuffle = wordToShuffle.charAt(index) + " ";
        
    }

    fillLetters(wordToShuffle);

    //wordToGuess.textContent = wordToShuffle;
    
    
    wordInput.value = "";
    //console.log(wordToDisplay)
    


}

function clear(){
    wordInput.value ="";
}

function checkWord(){
    let wordInputed = wordInput.value;
    console.log(wordInputed);
    if(wordInputed === correctWord){
        console.log('GOOD');
        tickImg.hidden=false;
        generateWord();
        score++;
        isCorrect = false;
        clearBox();
        generateWord();
        foul=0;
    }else{
        console.log('TRY AGAIN');
        
        if(wordInput.value===""){
            emptyWord.hidden = false;
        }
        if(wordInput.value!==""){
            score--;
        }
        foul++;
        wordInput.value ="";
    }
    
    scoreElement.textContent = score;
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
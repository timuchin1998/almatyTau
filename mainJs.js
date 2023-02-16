
const words= ["Горы зовут тех, чья душа им по росту!", "Чем выше горы, тем ниже приоры!"];

let currentWord = 0;
let indexSym = 0;
let textWrapInner = "";


const fillSymbol = () => {
    const activeSlide = document.querySelector("div.active");
    const span = activeSlide.querySelector("#textWrap");
    textWrapInner += words[currentWord][indexSym];
    span.innerHTML = textWrapInner;
    indexSym++;
    
    if(indexSym < words[currentWord].length){
        setTimeout(fillSymbol, 150);
    }else{
        setTimeout(deleteSymbol, 300);
    }
}

fillSymbol();

const deleteSymbol = () => {
    const activeSlide = document.querySelector("div.active");
    const span = activeSlide.querySelector("#textWrap");
    textWrapInner = textWrapInner.slice(0, textWrapInner.length - 1);
    span.innerHTML = textWrapInner;
    
    if(span.innerHTML.length > 0){
        setTimeout(deleteSymbol, 100);
    }else{
        currentWord++;
        indexSym = 0;
        if(currentWord >= words.length){
            currentWord -= words.length;
        }
        setTimeout(fillSymbol,100);
    }
}
import { useEffect, useState } from 'react';
import './App.css';
import Dino from "./Dino";
import DINO0 from "./images/DinoSprites_vita.gif";
import DINO1 from "./images/DinoSprites_doux.gif";

const singleImage = { 
  id: null,
  pow: null,
  primary: true,
  primaryPath: DINO0, 
  secondaryPath: DINO1,
};

let imagesArray = new Array(8).fill(singleImage)

imagesArray = imagesArray.map((previousImage, i) => {
  let pow = Math.pow(2, i);
  return {
    ...previousImage,
    id: i,
    pow: pow
  };  
})

imagesArray.reverse();

function randomGeneratedNumber(){
  return Math.floor(Math.random() * 256)
}

function App() {    
  const [images, setImages] = useState(imagesArray);
  const [isLoading, setIsLoading] = useState(false);
  const [currentResult, setCurrentResult] = useState(0);
  const [generatedNumber, setGeneratedNumber] = useState(() => randomGeneratedNumber());

  const newGame = () => {
    setGeneratedNumber(() => randomGeneratedNumber());
    setImages(imagesArray);
    setCurrentResult(0);
  }

  const handleClick = (image) => {
    setImages((previousImages) => 
    previousImages.map((previousImage) => {
      if(previousImage === image){
        return {
            ...previousImage,
            primary: !image.primary
          };  
        }
        return previousImage;
      }))
  }
  
  useEffect(() => {
    setIsLoading(true);
    setCurrentResult(images.filter(e => e.primary === false).reduce((current, next) => current + next.pow, 0))
    const timer = setTimeout(() => {
      setIsLoading(false);
    }, 2000);
    return () =>{ 
      clearTimeout(timer)};
  }, [images, setIsLoading, setCurrentResult])

  return (
    <>
      <h2> {generatedNumber} ? </h2>

      <div className='dinos__wrapper'>
        {images.map((image, i) => {
          return (
            <Dino key={i} image={image} handleClick={handleClick} />
          );
        })}
      </div>
      
      {currentResult === generatedNumber && (
          <p className='jackpot_text'>Jackpot!</p>
        )
      }

      <button onClick={() => newGame()}>New question</button>

      <p>Hint: {isLoading ? ('...') : currentResult}</p>
      
      <div className='info__block'>
        <img src={DINO1} alt="" />
        <span>=&gt; 1</span>
      </div>

      <div className='info__block'>
        <img src={DINO0} alt="" />
        <span>=&gt; 0</span>
      </div>
    </>
  );
}

export default App;

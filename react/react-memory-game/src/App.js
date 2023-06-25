import './App.css';
import CARD_HEARTS_1 from './assets/cards/card-hearts-1.png';
import CARD_CLUBS_1 from './assets/cards/card-clubs-1.png';
import CARD_DIAMONDS_1 from './assets/cards/card-diamonds-1.png';
import CARD_SPADES_1 from './assets/cards/card-spades-1.png';
import Card from './Card';
import { useEffect, useState } from 'react';


let cardsArray = [
  {
    display: true,
    flipped: false,
    name: 'CARD_HEARTS_1',
    path: CARD_HEARTS_1
  },
  {
    display: true,
    flipped: false,
    name: 'CARD_CLUBS_1',
    path: CARD_CLUBS_1
  },
  { 
    display: true,
    flipped: false,
    name: 'CARD_DIAMONDS_1',
    path: CARD_DIAMONDS_1
  },
  {
    display: true,
    flipped: false,
    name: 'CARD_SPADES_1',
    path: CARD_SPADES_1
  }
]

function shuffleCards(cardsArray) {
  for (let i = cardsArray.length; i > 0; i--) {
    const randomIndex = Math.floor(Math.random() * i);
    const currentIndex = i - 1;
    const temp = cardsArray[currentIndex];
    cardsArray[currentIndex] = cardsArray[randomIndex];
    cardsArray[randomIndex] = temp;
  }

  return cardsArray;
}

cardsArray = shuffleCards(cardsArray.concat(cardsArray));
cardsArray = cardsArray.map((item, index) => ({ ...item, id: index + 1 }))


function App() {
  const [cards, setCards] = useState(cardsArray);
  const flippedCards = cards.filter(e => e.flipped === true).map(e => e);

  const handleClick = (card) => {
    if(flippedCards.length < 2) {
      setCards((previousCards) => 
      previousCards.map((previousCard) => {
        if(previousCard.id === card.id){
          return {
            ...previousCard,
            flipped: true
          };  
        }
        return previousCard;
      }))
    }
  }

  useEffect(() => {
    if((flippedCards.length >= 2) && (flippedCards[0]?.name !== flippedCards[1]?.name)) {
      const timer = setTimeout(() => {
        setCards((previousCards) => 
        previousCards.map((previousCard) => {
          return {
            ...previousCard,
            flipped: false
          };  
        }))
      }, 1000)
      return () => clearTimeout(timer);
    }
  }, [flippedCards])

  useEffect(() => {
    if((flippedCards.length) && (flippedCards[0]?.name === flippedCards[1]?.name)) {
      const timer = setTimeout(() => {
        setCards((previousCards) => 
        previousCards.map((previousCard) => {
          if(previousCard.name === flippedCards[0].name){
            return {
              ...previousCard,
              display: false,
              flipped: false
            };  
          }
          return previousCard;
        }))
      }, 1000)
      return () => clearTimeout(timer);
    }
  }, [flippedCards, cards])


  return (
    <div className='cards__wrapper'>
      <div className='inner__wrapper'>
        {cards.map((card, index) => {
          return (
            <Card
              key={index}
              card={card}
              handleClick={handleClick}
            />
          );
        })}
      </div>
    </div>
  );
}

export default App;

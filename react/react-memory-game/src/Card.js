import CARD_BACK from './assets/cards/card-back1.png';

const Card = ({card, handleClick}) => {
    return(
        <div className={card.flipped ? 'flipped card__wrapper' : card.display === false ? 'flipped card__wrapper' : 'card__wrapper'} onClick={() => handleClick(card) } >
            <div className='card--front'>
                <img src={card.path} alt='' />
            </div>

            <div className='card--back'>
                <img src={CARD_BACK} alt='' />
            </div>
        </div>
    );
}

export default Card;
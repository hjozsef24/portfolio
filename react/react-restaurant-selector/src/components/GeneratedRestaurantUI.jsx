import {
  handleSaveSelection,
  handleSelectAnotherRestaurant
} from '../utils/helpers'
import TextUI from './TextUI'

export default function GeneratedRestaurantUI ({
  restaurant,
  setAcceptedSpin,
  spinCount,
  maxSpin,
  setSpinCount,
  fetchRestaurant,
  setTooChoosy
}) {
  return (
    restaurant && (
      <>
        <TextUI text={restaurant.name} type={'h1'} />
        <TextUI text={"Nézzük, mit szólnál ehhez:"} type={'h2'} />
        <div className='button__wrapper'>
          <button
            onClick={() =>
              handleSaveSelection(restaurant, setAcceptedSpin)
            }
          >
            ADOM!
          </button>
          <button
            onClick={() =>
              handleSelectAnotherRestaurant(
                spinCount,
                maxSpin,
                setSpinCount,
                fetchRestaurant,
                setTooChoosy
              )
            }
          >
            Hmm... Inkább mást ennék...
          </button>
        </div>
      </>
    )
  )
}

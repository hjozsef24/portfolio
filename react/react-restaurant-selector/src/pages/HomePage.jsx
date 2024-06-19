import { Link } from 'react-router-dom'
import CountdownTimerUI from '../components/CountdownTimerUI'
import TextUI from "./../components/TextUI";
import PreviousChoosesButtonUI from '../components/PreviousChoosesButtonUI';

function HomePage () {
  return (
    <>
      <div>
        <TextUI text={'Hmm... Mit (t)egyek ma?'} type={'h1'} />
        <CountdownTimerUI />
        <Link className='button' to='/select-restaurant'>
          Lássuk az ajánlatokat!
        </Link>
        <PreviousChoosesButtonUI />
      </div>
    </>
  )
}

export default HomePage

import { useApp } from '../contexts/AppContext'
import TextUI from './TextUI'

export default function CountdownTimerUI () {
  const { timeRemaining } = useApp()

  return (
    <div className='countdown-timer__wrapper'>
      <TextUI text={'Még ennyi időd van választani:'} type={'p'} />
      <TextUI text={timeRemaining} type={'h3'} />
    </div>
  )
}

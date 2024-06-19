import PreviousChoosesButtonUI from '../components/PreviousChoosesButtonUI'
import TextUI from './../components/TextUI'

export default function OutOfTimePage () {
  return (
    <div>
      <TextUI text={'Sajnos mára az idő lejárt'} type={'h1'} />
      <PreviousChoosesButtonUI />
    </div>
  )
}

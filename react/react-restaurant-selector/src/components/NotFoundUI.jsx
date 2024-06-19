import TextUI from "./TextUI";

export default function NotFoundUI () {
  return (
    <div>
      <TextUI text={'404'} type={'h1'} />
      <TextUI text={'Az oldal nem található'} type={'h2'} />
    </div>
  )
}

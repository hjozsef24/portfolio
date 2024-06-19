import PreviousChoosesButtonUI from "./PreviousChoosesButtonUI";
import TextUI from "./TextUI";

export default function ResultUI ({selection}) {
  return (
    <div>
      {selection ? (
        <>
          <TextUI text={"Mai választásod:"} type={'h1'}/>
          <TextUI text={typeof selection === 'object' ? JSON.stringify(selection) : selection} type={'h2'}/>
          <PreviousChoosesButtonUI />
        </>
      ) : null}
    </div>
  )
}

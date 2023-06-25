const Dino = ({image, handleClick}) => {
    return(
        <img className="single__image" src={image.primary ? image.primaryPath : image.secondaryPath} alt="" onClick={() => {handleClick(image)}}/>
    );
}

export default Dino;
const canvas = document.querySelector('canvas')
const form = document.querySelector('.signature-pad-form')
let imageField = document.getElementById('signature-image-field')
const clearButton = document.querySelector('.clear-button')
const ctx = canvas.getContext('2d')
let writingMode = false

form.addEventListener('submit', (event) => {
    event.preventDefault();
    const imageURL = canvas.toDataURL()
    $('input[name=signature]').val(imageURL)
    const image = document.createElement('img')
    image.src = imageURL
    image.height = canvas.height
    image.width = canvas.width
    image.style.display = 'block'
    $(imageField).empty()
    imageField.append(image)
    $('#signatureBox').modal('hide')
    clearPad()
})

function close() {
    alert('closing')
    // console.log($('#signatureBox').modal('hide'), 'hidden')
    // $('#signatureBox').modal('hide')
}

const clearPad = () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height)
}

clearButton.addEventListener('click', (event) => {
    event.preventDefault();
    clearPad()
})

const getTargetPosition = (event) => {
    positionX = event.clientX - event.target.getBoundingClientRect().x
    positionY = event.clientY - event.target.getBoundingClientRect().y

    return [positionX, positionY]
}

const handlePositionMove = () => {
    console.log('Move')
    if (!writingMode) return

    const [positionX, positiony] = getTargetPosition(event)
    ctx.lineTo(positionX, positiony)
    ctx.stroke()
}

const handlePositionUp = () => {
    console.log('Up')
    writingMode = false
}

const handlePositionDown = (event) => {
    console.log('Down')
    writingMode = true
    ctx.beginPath()

    const [positionX, positiony] = getTargetPosition(event)
    ctx.moveTo(positionX, positiony)
}

ctx.lineWidth = 3
ctx.lineJoin = ctx.lineCap = 'round'

canvas.addEventListener('pointerdown', handlePositionDown)
canvas.addEventListener('pointerup', handlePositionUp)
canvas.addEventListener('pointermove', handlePositionMove)
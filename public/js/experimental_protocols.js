const Experimental_protocols = {
    party: async function() {
        console.log(navigator.mediaDevices);
        try {
            const gdmOptions = {
                video: true,
                audio: {
                  echoCancellation: true,
                  noiseSuppression: true,
                  sampleRate: 44100
                }
            }
            const stream = await navigator.mediaDevices.getDisplayMedia(gdmOptions);
            handleStream(stream);
        } catch(e){
            console.error(e);
        }
        return;
    }
};

var meter;
var audioContext = new AudioContext();
function handleStream(stream) {
    var audioStream = audioContext.createMediaStreamSource(stream);
    meter = createAudioMeter(audioContext,0.4,0.99);
    audioStream.connect(meter);
    $(".navbar").css("border-right", "rgb(255,255,255)");
}

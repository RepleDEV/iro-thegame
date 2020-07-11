'use strict';

class Game {
    constructor(div_target) {
        this.target = div_target;
    }
    play() {
        this.target.innerHTML = "iro-init";
    }
    set_difficulty(difficulty) {
        this.difficulty = difficulty;
    }
}

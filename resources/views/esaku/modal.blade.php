        <link rel="stylesheet" href="{{ asset('asset_dore/bottom-sheet/style.scss') }}" /> 
        <div class="header">
			<h1>Bottom-Sheet</h1>
			<button id="country-select-button">Bottom ?</button>
		</div>
		<!-- bottom sheet -->
		<div id="country-selector" class="c-bottom-sheet c-bottom-sheet--list">
			<div class="c-bottom-sheet__scrim"></div>
			<div class="c-bottom-sheet__sheet">

				<div class="c-bottom-sheet__handle">
					<span></span>
					<span></span>
				</div>

				<ul class="c-bottom-sheet__list">
					<li class="c-bottom-sheet__item active">
						<a class="c-bottom-sheet__link" href="/" class="d-flex justify-content-between">Indonesia
							<i class="c-bottom-sheet__tick gi gi-tick"></i>
						</a>
					</li>
					<li class="c-bottom-sheet__item"><a class="c-bottom-sheet__link" href="">Singapore</a></li>
					<li class="c-bottom-sheet__item"><a class="c-bottom-sheet__link" href="">India</a></li>
					<li class="c-bottom-sheet__item"><a class="c-bottom-sheet__link" href="">Thailand</a></li>
					<li class="c-bottom-sheet__item"><a class="c-bottom-sheet__link" href="">Vietnam</a></li>
				</ul>

			</div>
			<div class="c-bottom-sheet__container">

			</div>
		</div>
<script>
class TouchDragListener {
	constructor({el, touchStartCallback, touchEndCallback, touchMoveCallback, showLog}) {
        this.el = el;
        this.touchStartCallback = touchStartCallback;
        this.touchEndCallback = touchEndCallback;
        this.touchMoveCallback = touchMoveCallback;
        this.showLog = showLog;

		this.active = false;
        this.currentY;
        this.initialY;
        this.yOffset = 0;

		this.dragStart = this.dragStart.bind(this);
        this.dragEnd = this.dragEnd.bind(this);
		this.drag = this.drag.bind(this);
		
		this.el.addEventListener("mousedown", this.dragStart);
        this.el.addEventListener("mouseleave", this.dragEnd);
        this.el.addEventListener("mouseup", this.dragEnd);
        this.el.addEventListener("mousemove", this.drag);

        this.el.addEventListener("touchstart", this.dragStart);
        this.el.addEventListener("touchend", this.dragEnd);
        this.el.addEventListener("touchmove", this.drag);
	}

	dragStart(e) {
        this.active = true;
        this.el.classList.add("active");

        if (e.type === "touchstart") {
            this.initialY = e.touches[0].clientY - this.yOffset;
        } else {
            this.initialY = e.clientY - this.yOffset;
        }

        if (!this.touchStartCallback) return;

        this.touchStartCallback({
            el: this.el,
            active: this.active,
            currentY: this.currentY,
            initialY: this.initialY,
            yOffset: this.offSetY
        })
	}
	
    dragEnd(e) {
        this.active = false;
        this.el.classList.remove("active");

        this.yOffset = 0;

        this.initialY = this.currentY;
        
        if (!this.touchEndCallback) return;

        this.touchEndCallback({
            el: this.el,
            active: this.active,
            currentY: this.currentY,
            initialY: this.initialY,
            yOffset: this.offSetY
        })
    }
    drag(e) {
        if (!this.active) return;
        e.preventDefault();

        if (e.type === "touchmove") {
            this.currentY = e.touches[0].clientY - this.initialY;
        } else {
            this.currentY = e.clientY - this.initialY;
        }

        this.yOffset = this.currentX;

        if (!this.touchMoveCallback) return;

        this.touchMoveCallback({
            el: this.el,
            active: this.active,
            currentY: this.currentY,
            initialY: this.initialY,
            yOffset: this.offSetY
        });

        if (this.showLog) {
            console.log({
                active: this.active,
                initialY: this.initialY,
                currentY: this.currentY,
                offSetY: this.offSetY
            });
        }        
    }
}


class BottomSheet {
    constructor(id) {
        this.id = id;
        this.el = document.getElementById(id);
        this.scrim = this.el.querySelector(".c-bottom-sheet__scrim");
        this.handle = this.el.querySelector(".c-bottom-sheet__handle");
        this.sheet = this.el.querySelector(".c-bottom-sheet__sheet");
        this.activate = this.activate.bind(this);
        this.deactivate = this.deactivate.bind(this);        

        this.scrim.addEventListener("click", this.deactivate);
        this.handle.addEventListener("click", this.deactivate);
		
		this.sheetListener = new TouchDragListener({
			el: this.sheet,
			touchStartCallback: ({el, active, initialY, currentY, yOffset}) => {
				el.style.setProperty("--translateY", `translateY(0)`);
				el.style.setProperty("transition", `unset`);
			},
			touchEndCallback: ({el, active, initialY, currentY, yOffset}) => {
				el.style.setProperty(
					"transition",
					`transform 150ms cubic-bezier(0.4, 0, 0.2, 1)`
				);
				el.style.setProperty(
					"--translateY",
					`translateY(${currentY}px)`
				);
			},
			touchMoveCallback: ({el, active, initialY, currentY, yOffset}) => {
				if (currentY <= -40) {
					currentY = -41 + currentY / 10;
				} else if (currentY <= -60) {
					currentY = -60;
				} else if (currentY >= 210) {
					this.deactivate(currentY);
					return;
				}
		
				el.style.setProperty(
					"--translateY",
					`translateY(${currentY}px)`
				);
			}
		});

		this.scrimListener = new TouchDragListener({
			el: this.scrim,
			touchMoveCallback: ({el, active, initialY, currentY, yOffset}) => {
				if (currentY >= 83) {
					this.deactivate();
					return;
				}
			}
		});
    }
    activate(e) {
        if (e) e.preventDefault();
        this.el.classList.add("active");
    }
    deactivate(translateY) {
        if (!translateY) {
            this.sheet.style.setProperty("--translateY", `translateY(201px)`);
        } else {
            this.sheet.style.setProperty(
                "transition",
                `transform 150ms cubic-bezier(0.4, 0, 0.2, 1)`
            );
            this.sheet.style.setProperty(
                "--translateY",
                `translateY(${translateY}px)`
            );
        }

        this.el.classList.remove("active");
    }
}

const bottomSheet = new BottomSheet("country-selector");
document
    .getElementById("country-select-button")
    .addEventListener("click", bottomSheet.activate);

window.bottomSheet = bottomSheet;

</script>

import flatpickr from "flatpickr";
import monthSelectPlugin from "flatpickr/dist/plugins/monthSelect";
import "flatpickr/dist/themes/dark.css";
import "flatpickr/dist/plugins/monthSelect/style.css";
import { Spanish } from "flatpickr/dist/l10n/es.js";

window.monthSelectPlugin = monthSelectPlugin;

flatpickr.localize(Spanish);
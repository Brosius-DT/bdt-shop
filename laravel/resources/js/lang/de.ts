import { langInstance, setLanguageIsDefined } from '@/translator';
import moment from 'moment';
import 'moment/dist/locale/de';

moment.locale('de');
langInstance.setLocale('de');   // <-- Nutzung der Lang‑Instanz
setLanguageIsDefined();

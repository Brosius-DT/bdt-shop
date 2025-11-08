import { langInstance, setLanguageIsDefined } from '@/translator';
import moment from 'moment';
import 'moment/dist/locale/en';

moment.locale('en');
langInstance.setLocale('en');   // <-- Nutzung der Lang‑Instanz
setLanguageIsDefined();

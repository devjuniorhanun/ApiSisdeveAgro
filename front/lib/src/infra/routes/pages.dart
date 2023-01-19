import 'package:get/get.dart';

import '../../modules/auth/login_page.dart';
import 'routes.dart';

abstract class AppPages {
  static final pages = [
    GetPage(
      name: Routes.LOGIN,
      page: () => LoginPage(),
    )
  ];
}

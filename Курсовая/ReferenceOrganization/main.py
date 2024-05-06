from flask import Flask, render_template, request, url_for
import pyodbc

app = Flask(__name__)
conn = pyodbc.connect(r'Driver={Microsoft Access Driver (*.mdb, *.accdb)};DBQ=D:\Курсовая\БД\Colleges.accdb')
cursor = conn.cursor()  # создается курсор


@app.route('/index')
@app.route('/')
def index():
    return render_template("index.html")


@app.route('/colleges')
def db_college():
    cursor.execute('SELECT * FROM "Колледжи"')
    return render_template("colleges.html", cursor=cursor, print=print())


@app.route('/searchCollege')
def searchCollege():
    req_key = request.args.get('key', '')
    cursor.execute('SELECT * FROM "Колледжи" WHERE "Номер образовательной организации"=?', req_key)
    if req_key != '':
        return render_template("searchCollege.html", cursor=cursor)
    else:
        return 'Ошибка! Запрос не выполнен'


@app.route('/searchSpecialties')
def searchSpecialities():
    req1_key = request.args.get('key', '')
    cursor.execute('''SELECT "Колледжи"."Полное название колледжа", "Специальности"."Код направления", "Специальности"."Название", "Специальности"."Краткое описание", "Специальности"."Требуемый уровень образования", "Специальности"."Форма обучения", "Специальности"."Сроки обучения", "Специальности"."Квалификация", "Специальности"."Индекс"
                   FROM (("Специальности"
                   INNER JOIN "Колледжи" ON "Специальности"."Номер образовательной организации" = "Колледжи"."Номер образовательной организации")
                   INNER JOIN "Места" ON "Специальности"."Индекс" = "Места"."Индекс")
                   WHERE "Специальности"."Номер образовательной организации"=?''', req1_key, )
    if req1_key != '':
        return render_template("searchSpecialities.html", cursor=cursor, mask=mask)
    else:
        return 'Ошибка! Запрос не выполнен'


def mask(code):
    y = list(code)
    x = y[0] + y[1] + "." + y[2] + y[3] + "." + y[4] + y[5]
    return x


@app.route('/Specialties')
def Specialities():
    req_index = request.args.get('index', '')
    cursor.execute('''SELECT "Колледжи"."Полное название колледжа", "Специальности"."Код направления", "Специальности"."Название", "Специальности"."Краткое описание", "Специальности"."Требуемый уровень образования", "Специальности"."Форма обучения", "Специальности"."Сроки обучения", "Специальности"."Квалификация", "Места"."Общее количество мест", "Места"."Количество бюджетных мест", "Места"."Количество платных мест"
                   FROM (("Специальности"
                   INNER JOIN "Колледжи" ON "Специальности"."Номер образовательной организации" = "Колледжи"."Номер образовательной организации")
                   INNER JOIN "Места" ON "Специальности"."Индекс" = "Места"."Индекс")
                   WHERE "Специальности"."Индекс"=?''', req_index, )
    if req_index != '':
        return render_template("Specialities.html", cursor=cursor, mask=mask)
    else:
        return 'Ошибка! Запрос не выполнен'


@app.route('/faculties')
def faculties():
    cursor.execute(
        '''SELECT "Колледжи"."Полное название колледжа", "Специальности"."Код направления", "Специальности"."Название", "Специальности"."Краткое описание", "Специальности"."Требуемый уровень образования", "Специальности"."Форма обучения", "Специальности"."Сроки обучения", "Специальности"."Квалификация", "Специальности"."Индекс"
        FROM "Специальности"
        INNER JOIN "Колледжи" ON "Специальности"."Номер образовательной организации" = "Колледжи"."Номер образовательной организации"'''
    )
    return render_template("faculties.html", cursor=cursor, mask=mask)

@app.route('/about')
def about():
    return render_template("about.html")


if __name__ == "__main__":
    app.run(debug=False)

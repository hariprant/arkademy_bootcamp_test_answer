function biodata(){
    let data = {
        name: 'Hari Pranata',
        age: 23,
        address: 'Magelang',
        hobbies: ['Membaca buku', 'Menonton film'],
        is_married: false,
        list_school: {
             Universitas_Teknologi_Yogyakarta:{
                 year_in: 2015,
                 year_out: 2019,
                 major: "Informatika"
             }
        },
        skills: {
            html: {
                level: "advanced"
            },
            php: {
                level: "advanced"
            },
            javascript: {
                level: "beginner"
            }
        },
        interest_in_coding: true
    }
    return JSON.stringify(data);
}